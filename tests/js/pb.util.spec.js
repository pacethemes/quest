var expect = chai.expect;
var should = chai.should();

describe('Pace Builder Utilities', function() {

    describe('#string.toProperCase()', function() {

        it('should convert all lowercase word to title case', function() {
            'alphabet'.toProperCase().should.equal('Alphabet');
        });

        it('should convert all uppercase word to title case', function() {
            'ALPHABET'.toProperCase().should.equal('Alphabet');
        });

    });

});
